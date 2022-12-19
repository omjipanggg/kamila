<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class InsertForm extends Form
{
    public function buildForm()
    {
        $table = $this->model->getTable();
        $colNames = \Schema::getColumnListing($table);
        foreach ($colNames as $key => $value) {
            switch (\Schema::getColumnType($table, $value)) {
                case 'string':
                    $type = 'text';
                break;
                case 'date':
                    $type = 'date';
                break;
                case 'integer':
                    $type = 'number';
                break;
                case 'datetime':
                    $type = 'date';
                break;
                case 'text':
                    $type = 'textarea';
                break;
                default:
                    $type = 'text';
                break;
            }
           
           if ($this->isForeign($table, $value)) {
                $this->add($value, 'select', [
                    'label' => $value,
                    'choices' => $this->getData($value),
                    'attr' => [
                        'class' => 'form-control form-control-sm',
                    ],
                ]);
            } else {
                if ($value == 'resume') {
                    $this->add($value, 'file', [
                        'label' => $value,
                        'attr' => [
                            'class' => 'form-control form-control-sm',
                        ],
                    ]);
                } else {                
                    $this->add($value, $type, [
                        'label' => $value,
                        'attr' => [
                            'class' => 'form-control form-control-sm',
                            'autocomplete' => 'off',
                        ],
                    ]);
                }
            }
        }
        $this->add('submit&nbsp;&nbsp;<i class="fas fa-trash-alt"></i>', 'submit',
            ['attr' => [
                'class' => 'btn btn-sm btn-color my-2',
            ],
        ]);
    }

    public function isForeign(string $table, string $column)
    {
        $columns = \Schema::getConnection()->getDoctrineSchemaManager()->listTableForeignKeys($table);
        return collect($columns)->map(function ($item) {
            return $item->getColumns();
        })->flatten()->contains($column);
    }
}