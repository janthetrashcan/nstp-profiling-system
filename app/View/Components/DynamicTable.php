<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DynamicTable extends Component
{
    public $data;
    public $columns;
    public $actions;
    /**
     * Create a new component instance.
     * @param array $data Data to be displayed in the table
     * @param array $columns Custom column definitions
     * @param array|null $actions Optional actions for each row
     */

    public function __construct(array $data, array $columns, ?array $actions = null)
    {
        $this->data = $data;
        $this->columns = $columns;
        $this->actions = $actions ?? [];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dynamic-table');
    }

    /**
     * Render a specific column value
     *
     * @param mixed $row The current row data
     * @param array $column The column definition
     * @return string
     */

    public function renderColumnValue($row, $column): string
    {
        // use custom renderer if it is provided
        if (isset($column['renderer']) && is_callable($column['renderer'])){
            return $column['renderer']($row);
        }

        // default to accessing the key directly
        return $row[$column['key']] ?? '';
    }
}
