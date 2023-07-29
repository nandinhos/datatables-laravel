<?php

namespace App\DataTables;
 
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
 
class UsersDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))->setRowId('id');
    }
 
    public function query(User $model): QueryBuilder
    {
        

        return $model->newQuery();
        
    }
 
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->parameters([
                        'dom'          => 'Bfrtip',
                        'buttons'      => ['excel', 'csv', 'pdf', 'print'],
                    ]);
    }
 
    protected function getColumns()
    {
        //colunas da tabela do banco de dados
        return [
            'id',
            'name',
            'email',
            'created_at',
            'updated_at',
        ];
    }
 
    protected function filename(): string
    {
        return 'Users_'.date('YmdHis');
    }
}