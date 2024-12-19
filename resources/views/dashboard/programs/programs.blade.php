<x-dashboard-layout>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Programs</h1>
        <form action="{{ route('programs.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="flex gap-2">
                <input type="text" name="program_Code" placeholder="Program Code" class="border p-2 rounded w-1/4">
                <input type="text" name="program_Title" placeholder="Program Title" class="border p-2 rounded w-1/2">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Add Program</button>
            </div>
        </form>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border p-2">Program Code</th>
                    <th class="border p-2">Program Title</th>
                    <th class="border p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($programs as $program)
                    <tr>
                        <td class="border p-2 w-[20%]">
                            <input
                                type="text"
                                name="program_Code"
                                value="{{ $program->program_Code }}"
                                class="border-none bg-gray-100 w-full"
                                readonly
                            />
                            <input
                                type="text"
                                name="program_id"
                                value="{{ $program->program_id }}"
                                class="border-none bg-gray-100 w-full hidden"
                                name="program_id"
                                readonly
                            />
                        </td>
                        <td class="border p-2 w-[65%]">
                            <input
                                type="text"
                                name="program_Title"
                                value="{{ $program->program_Title }}"
                                class="border-none bg-gray-100 w-full"
                                readonly
                            />
                        </td>
                        <td class="border p-2 h-fill flex gap-2 justify-stretch align-middle">
                            <button
                                class="bg-yellow-500 text-white px-4 py-1 rounded edit-btn w-1/2 flex flex-row justify-center items-center gap-3"
                                data-id="{{ $program->id }}"
                            ><x-carbon-edit class='h-[1.2rem]'/>Edit</button>
                            <form
                                action="{{ route('programs.destroy', $program) }}"
                                method="POST"
                                class="delete-form w-1/2"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded w-fill flex flex-row justify-center items-center gap-3">
                                    <x-carbon-delete class='h-[1.2rem]'/>Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                console.error("CSRF token meta tag is missing in the layout.");
                return;
            }

            document.querySelectorAll('.edit-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const row = this.closest('tr');
                    if (!row) {
                        console.error("Row not found for the clicked button");
                        return;
                    }

                    const inputs = row.querySelectorAll('input[type="text"]');
                    const deleteForm = row.querySelector('.delete-form');
                    const programIdField = row.querySelector('input[name="program_id"]');  // Hidden input for program_id

                    // Check if programIdField exists
                    if (!programIdField) {
                        console.error("Program ID field not found in the row");
                        return;
                    }

                    const programId = programIdField.value;  // Get program_id from the hidden input
                    const programCodeField = row.querySelector('input[name="program_Code"]');

                    if (!programCodeField) {
                        console.error("Program Code field not found in the row");
                        return;
                    }

                    const programCode = programCodeField.value; // Get the programCode

                    // Enable inputs for editing
                    inputs.forEach(input => {
                        input.readOnly = false;
                        input.classList.remove('bg-gray-100');
                        input.classList.add('bg-white', 'border');
                    });

                    // Create Save and Cancel buttons
                    const saveBtn = document.createElement('button');
                    saveBtn.textContent = 'Save';
                    saveBtn.classList.add('bg-green-500', 'text-white', 'px-4', 'py-1', 'rounded');
                    saveBtn.setAttribute('data-id', programId);  // Set programId to Save button
                    const cancelBtn = document.createElement('button');
                    cancelBtn.textContent = 'Cancel';
                    cancelBtn.classList.add('bg-gray-500', 'text-white', 'px-4', 'py-1', 'rounded');

                    // Replace Edit and Delete buttons
                    this.replaceWith(saveBtn);
                    deleteForm.replaceWith(cancelBtn);

                    // Handle Save Button Click
                    saveBtn.addEventListener('click', async () => {
                        const [programCode, programId, programTitle] = Array.from(inputs).map(input => input.value);

                        console.log('Saving:', { programId, programCode, programTitle }); // Debug log

                        // Perform the PUT request
                        try {
                            const response = await fetch(`/dashboard/programs/update/${programCode}`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken.content,
                                },
                                body: JSON.stringify({
                                    program_id: programId,  // Pass the program_id from the hidden input
                                    program_Code: programCode,
                                    program_Title: programTitle
                                }),
                            });

                            if (response.ok) {
                                console.log('Program updated successfully');
                                // Revert inputs to read-only
                                inputs.forEach(input => {
                                    input.readOnly = true;
                                    input.classList.add('bg-gray-100');
                                    input.classList.remove('bg-white', 'border');
                                });

                                // Replace Save and Cancel with Edit and Delete
                                saveBtn.replaceWith(this);
                                cancelBtn.replaceWith(deleteForm);
                            } else {
                                console.error('Failed to save the program:', response.statusText);
                                alert('Failed to update the program. Please try again.');
                            }
                        } catch (error) {
                            console.error('Error during save request:', error);
                            alert('An error occurred. Please try again.');
                        }
                    });

                    // Handle Cancel Button Click
                    cancelBtn.addEventListener('click', () => {
                        // Restore inputs to original values
                        inputs.forEach(input => {
                            input.value = input.defaultValue; // Reset to original value
                            input.readOnly = true;
                            input.classList.add('bg-gray-100');
                            input.classList.remove('bg-white', 'border');
                        });

                        // Replace Save and Cancel with Edit and Delete
                        saveBtn.replaceWith(this);
                        cancelBtn.replaceWith(deleteForm);
                    });
                });
            });
        });
    </script>
</x-dashboard-layout>
