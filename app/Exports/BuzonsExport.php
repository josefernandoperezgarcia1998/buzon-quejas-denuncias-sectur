<?php

namespace App\Exports;

use App\Models\Buzon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BuzonsExport implements FromCollection, WithHeadings, WithMapping, WithEvents, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Buzon::with('area','area_denunciante')->get();
    }

    // Encabezados del excel
    public function headings(): array
    {

        return [
            'Folio',
            'Nombre denunciante',
            'Telefono',
            'Correo electrónico',
            'Área de adscripción',
            'Cargo ó Puesto',
            'Fecha',
            'Nombre denunciado',
            'Área de adscripción',        
            'Cargo ó Puesto',
            'Fecha del evento',
            'Mensaje',
            'Nombre testigo',
            'Domicilio',
            'Teléfono',
            'Correo electrónico',
            '¿Trabaja en administración pública estatal?',
            'Entidad ó Dependencia',
            'Cargo',
            'Estado',
        ];
    }

    // Recorrido del arreglo del modelo Buzon
    public function map($buzon) : array {
        return [
            $buzon->folio,
            $buzon->nombre,
            $buzon->telefono,
            $buzon->email,
            $buzon->area->nombre,
            $buzon->cargo_puesto,
            $buzon->fecha,
            $buzon->nombre_servidor_denuncia,
            $buzon->area_denunciante->nombre,
            $buzon->cargo_puesto_servidor_denuncia,
            $buzon->fecha_servidor_denuncia,
            $buzon->mensaje_breve_servidor_denuncia,
            $buzon->nombre_testigo,
            $buzon->domicilio_testigo,
            $buzon->telefono_testigo,
            $buzon->email_testigo,
            $buzon->trabajo_admon_publica,
            $buzon->entidad_dependencia_testigo,
            $buzon->cargo_testigo,
            $buzon->estado,
        ] ;
    }

    // Estilo para agregarle un color al encabezado
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:T1')
                        ->getFill()
                        ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('9DD5FA');
            },
        ];
    }
}
