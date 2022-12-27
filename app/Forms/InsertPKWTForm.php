<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\Field;

class InsertPKWTForm extends Form
{
    public function buildForm()
    {
        $records = [
            'uniqueHead', // 002/DIR-KP/PKWT-1/HQ-JBT/XII/2022      uniqueHead() // fillable()
            // 'applicantName', // Maulana Ajie Pamungkas              fetch()
            // 'dayString', // Senin                                   dayString()
            // 'domString', // Dua Puluh Tiga                          numString()
            // 'monthString', // Agustus                               monthString()
            // 'yearString', // Dua Ribu Dua Puluh Dua                 numString()
            // 'fullDate', // 23/08/2022                               now()
            'newEmployeeId', // B0222102                            fillable->text() // newlyId()
            // 'applicantIdNumber', // 3604012907960049                fetch()
            // 'applicantBirthPlace', // Tangerang                     fillable->text()
            // 'applicantBirthDate', // 29 Juli 1996                   dateFormat() 
            // 'applicantGender', // Laki-laki                         genderString() 
            // 'applicantAddress', // Jl. K.M. Idris No.12             fetch() 
            // 'proposalPosition', // IT Developer                     dateFormat() 
            // 'proposalDepartment', // Business                       dateFormat() 
            // 'proposalVendor', // Telkomsel                          dateFormat() 
            // 'workPlace', // KAM Raden Inten                         fillable->select() 
            'startDate', // 10/03/2022                              fillable->date()
            'endDate', // 04/10/2023                                fillable->date()
            // 'countDays', // 22 Bulan, 18 hari                       countDays(start, end)
            'totalSalary', // 7000000                               fillable->text()
            'primarySalary', // 4600000                             fillable->text()
            'secondarySalary', // 2400000                           fillable->text()
        ];

        $this->add('template', 'hidden', [
            'value' => $this->getData('template'),
        ]);

        $fields = $this->uniqueMulti($this->getData('name'));

        foreach ($this->getData('model') as $key => $value) {
            $this->add('proposal_id', 'hidden', [
                'label' => 'Proposal',
                'value' => $value->id,
            ]);
            for ($i=0; $i < count($fields); $i++) {
                if (stripos($fields[$i], 'date') !== false) {
                    $this->add($fields[$i], 'date', [
                        'label' => $fields[$i],
                        'attr' => [
                            'class' => 'form-control form-control-sm mb-2',
                            'autocomplete' => 'off',
                            'placeholder' => $fields[$i],
                        ],
                    ]);
                } else {
                    $this->add($fields[$i], 'text', [
                        'label' => false,
                        'attr' => [
                            'class' => 'form-control form-control-sm mb-2',
                            'autocomplete' => 'off',
                            'placeholder' => $fields[$i],
                        ],
                    ]);
                }
            }
        }

        $this->add('save&nbsp;&nbsp;<i class="fas fa-floppy-disk"></i>', 'submit',
            ['attr' => [
                'class' => 'btn btn-sm btn-color mb-2',
            ],
        ]);
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
