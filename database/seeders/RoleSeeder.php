<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_admin = Role::firstOrCreate(['name' => 'SUPER ADMIN','guard_name' => 'web']);
        $admin = Role::firstOrCreate(['name' => 'ADMINISTRADOR','guard_name' => 'web']);
        $vendedor = Role::firstOrCreate(['name' => 'VENDEDOR','guard_name' => 'web']);
        $contabilidad = Role::firstOrCreate(['name' => 'CONTABILIDAD','guard_name' => 'web']);   
        $operador = Role::firstOrCreate(['name' => 'OPERADOR','guard_name' => 'web']); 
        $cliente = Role::firstOrCreate(['name' => 'CLIENTE','guard_name' => 'web']);
        
        // ======================= HOME ADMIN =======================
        Permission::firstOrCreate(['name' => 'Ver dashboard de admin'])->syncRoles($super_admin);
        
        // ======================= AJUSTES ADMIN =======================
        Permission::firstOrCreate(['name' => 'Ver ajustes del sistema'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Actualizar ajustes del sistema'])->syncRoles($super_admin);

        // ======================= ROLES =======================
        Permission::firstOrCreate(['name' => 'Ver listado de roles'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Crear roles'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Guardar roles'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Ver rol'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Editar roles'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Actualizar roles'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Eliminar roles'])->syncRoles($super_admin);

        // ======================= PERMISOS =======================
        Permission::firstOrCreate(['name' => 'Ver listado de permisos'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Actualizar permisos'])->syncRoles($super_admin);

        // ======================= USUARIOS =======================
        Permission::firstOrCreate(['name' => 'Ver listado de usuarios'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Crear usuarios'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Guardar usuarios'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Ver usuario'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Editar usuarios'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Actualizar usuarios'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Eliminar usuarios'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Restaurar usuarios'])->syncRoles($super_admin);

        // ======================= CATEGORIAS =======================
        Permission::firstOrCreate(['name' => 'Ver listado de categorias'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Crear categorias'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Guardar categorias'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Ver categoria'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Editar categorias'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Actualizar categorias'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Eliminar categorias'])->syncRoles($super_admin);

        // ======================= PRODUCTOS =======================
        Permission::firstOrCreate(['name' => 'Ver listado de productos'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Crear productos'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Guardar productos'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Ver producto'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Editar productos'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Actualizar productos'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Eliminar productos'])->syncRoles($super_admin);

        // ======================= IMAGENES PRODUCTOS =======================
        Permission::firstOrCreate(['name' => 'Ver imagenes de productos'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Subir imagenes de productos'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Eliminar imagenes de productos'])->syncRoles($super_admin);

        // ======================= PEDIDOS =======================
        Permission::firstOrCreate(['name' => 'Ver listado de pedidos'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Crear Pedido'])->syncRoles($super_admin);
        Permission::firstOrCreate(['name' => 'Procesar pedido'])->syncRoles($super_admin);

        // ======================= WEB PUBLICA =======================
        /* Permission::firstOrCreate(['name' => 'Ver pagina principal']);
        Permission::firstOrCreate(['name' => 'Ver detalle producto']);
        Permission::firstOrCreate(['name' => 'Ver dashboard usuario']);
        Permission::firstOrCreate(['name' => 'Ver ajustes usuario']);
        Permission::firstOrCreate(['name' => 'Actualizar informacion personal']);
        Permission::firstOrCreate(['name' => 'Actualizar password']);
        Permission::firstOrCreate(['name' => 'Ver mis ventas']);
        Permission::firstOrCreate(['name' => 'Buscar productos']); */

        // ======================= CARRITO =======================
        /* Permission::firstOrCreate(['name' => 'Ver carrito']);
        Permission::firstOrCreate(['name' => 'Agregar al carrito']);
        Permission::firstOrCreate(['name' => 'Actualizar carrito']);
        Permission::firstOrCreate(['name' => 'Eliminar del carrito']);
        Permission::firstOrCreate(['name' => 'Vaciar carrito']);*/

        // ======================= FAVORITOS =======================
        /* Permission::firstOrCreate(['name' => 'Ver favoritos']);
        Permission::firstOrCreate(['name' => 'Agregar favoritos']);
        Permission::firstOrCreate(['name' => 'Eliminar favoritos']);*/

        // ======================= LOGIN Y REGISTRO =======================
        /*Permission::firstOrCreate(['name' => 'Ver login web']);
        Permission::firstOrCreate(['name' => 'Procesar login web']);
        Permission::firstOrCreate(['name' => 'Ver registro web']);
        Permission::firstOrCreate(['name' => 'Crear cuenta web']);*/

        // ======================= PAYPAL =======================
        /*Permission::firstOrCreate(['name' => 'Pagar con paypal']);
        Permission::firstOrCreate(['name' => 'Ver gracias paypal']);
        Permission::firstOrCreate(['name' => 'Completar orden paypal']);
        Permission::firstOrCreate(['name' => 'Cancelar pago paypal']);*/ 
        

    }
}
