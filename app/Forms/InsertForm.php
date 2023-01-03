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
                $childModel = '\\App\\Models\\';
                if ($value === 'published_by') {
                    $childModel = new \App\Models\User;
                } else {
                    $childModel .= \Str::studly(\Str::singular(str_replace('_id', '', $value)));
                }
                $this->add($value, 'select', [
                    'label' => $value,
                    'choices' => $childModel::pluck('name', 'id')->toArray(),
                    'empty_value' => '——Pilih satu——',
                    'attr' => [
                        'class' => 'form-control',
                    ],
                ]);
            } else {
                if ($value == 'resume') {
                    $this->add($value, 'file', [
                        'label' => $value,
                        'attr' => [
                            'class' => 'form-control',
                        ],
                    ]);
                }
                else if ($value == 'id') {}
                else if ($value == 'status') {}
                else if ($value == 'created_at') {}
                else if ($value == 'updated_at') {}
                else {                
                    $this->add($value, $type, [
                        'label' => $value,
                        'attr' => [
                            'class' => 'form-control',
                            'autocomplete' => 'off',
                            'rows' => 6,
                        ],
                    ]);
                }
            }
        }
        $this->add('save&nbsp;&nbsp;<i class="fas fa-floppy-disk"></i>', 'submit',
            ['attr' => [
                'class' => 'btn btn-color mt-3 w-100',
            ],
        ]);
    }

    public function isForeign($table, $column) {
        $columns = \Schema::getConnection()->getDoctrineSchemaManager()->listTableForeignKeys($table);
        return collect($columns)->map(function ($item) {
            return $item->getColumns();
        })->flatten()->contains($column);
    }

    public function uniqueMulti($array) {
        $uniqueArray = array();
        foreach($array as $sub) {
            if (!in_array($sub, $uniqueArray)) {
                $uniqueArray[] = $sub;
            }
        }
        return $uniqueArray;
    }
}