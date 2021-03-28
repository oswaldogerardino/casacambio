<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configuracion')->insert([
            'id'               => 1,
            'nombre_empresa'   => "CASACAMBIO",
            'slogan'           => "Rapidéz y Eficiencia",
            'codigo_empresa'   => "COD-0001",
            'valor_moneda'     => 1,
        ]);

        DB::table('roles')->insert([
            'id'       => 1,
            'nombre'   => "SUPERADMIN",
            'status'   => 1,
        ]);

        DB::table('puestos')->insert([
            'id'       => 1,
            'nombre'   => "PUESTO 1",
            'status'   => 1,
        ]);

        DB::table('roles')->insert([
            'id'       => 2,
            'nombre'   => "ADMINISTRADOR",
            'status'   => 1,
        ]);

        DB::table('users')->insert([
            'id'        => 1,
            'nombre'    => "OSWALDO",
            'email'     => 'oswaldogeovanny@gmail.com',
            'rol_id'    => 1,
            'puesto_id' => 1,
            'password'  => bcrypt('123456'),
        ]);

        DB::table('users')->insert([
            'id'        => 2,
            'nombre'    => "ADMIN",
            'email'     => 'admin@admin.com',
            'rol_id'    => 2,
            'puesto_id' => 1,
            'password'  => bcrypt('123456'),
        ]);

        DB::table('permisos')->insert([
            'id'                         => 1,
            'rol_id'                     => 1,
            'facturar'                   => 1,
            'cuenta_crear'               => 1,
            'cuenta_editar'              => 1,
            'cuenta_borrar'              => 1,
            'cliente_crear'              => 1,
            'cliente_editar'             => 1,
            'cliente_borrar'             => 1,
            'banco_crear'                => 1,
            'banco_editar'               => 1,
            'banco_borrar'               => 1,
            'factura_pendiente_ver'      => 1,
            'factura_pendiente_procesos' => 1,
            'factura_rechazada_ver'      => 1,
            'factura_rechazada_procesos' => 1,
            'factura_aprobada_ver'       => 1,
            'factura_aprobada_procesos'  => 1,
            'movimientos_diario'         => 1,
            'movimientos_estadistica'    => 1,
        ]);

        DB::table('permisos')->insert([
            'id'                         => 2,
            'rol_id'                     => 2,
            'facturar'                   => 1,
            'cuenta_crear'               => 1,
            'cuenta_editar'              => 1,
            'cuenta_borrar'              => 1,
            'cliente_crear'              => 1,
            'cliente_editar'             => 1,
            'cliente_borrar'             => 1,
            'banco_crear'                => 1,
            'banco_editar'               => 1,
            'banco_borrar'               => 1,
            'factura_pendiente_ver'      => 1,
            'factura_pendiente_procesos' => 1,
            'factura_rechazada_ver'      => 1,
            'factura_rechazada_procesos' => 1,
            'factura_aprobada_ver'       => 1,
            'factura_aprobada_procesos'  => 1,
            'movimientos_diario'         => 1,
            'movimientos_estadistica'    => 1,
        ]);
    }
}
