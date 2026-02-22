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
        $super_admin = Role::create(['name' => 'SUPER ADMIN','guard_name' => 'web']);
        $admin = Role::create(['name' => 'ADMINISTRADOR','guard_name' => 'web']);
        $vendedor = Role::create(['name' => 'VENDEDOR','guard_name' => 'web']);
        $contabilidad = Role::create(['name' => 'CONTABILIDAD','guard_name' => 'web']);   
        $operador = Role::create(['name' => 'OPERADOR','guard_name' => 'web']); 
        $cliente = Role::create(['name' => 'CLIENTE','guard_name' => 'web']);
        
        Permission::create(['name' => 'Ver home admin'])->syncRoles($super_admin);
        Permission::create(['name' => 'Ver panel admin'])->syncRoles($super_admin);

        // ======================= AJUSTES ADMIN =======================
        Permission::create(['name' => 'Ver ajustes del sistema'])->syncRoles($super_admin);
        Permission::create(['name' => 'Guardar ajustes del sistema'])->syncRoles($super_admin);

        // ======================= ROLES =======================
        Permission::create(['name' => 'Listado de roles'])->syncRoles($super_admin);
        Permission::create(['name' => 'Crear roles'])->syncRoles($super_admin);
        Permission::create(['name' => 'Guardar roles'])->syncRoles($super_admin);
        Permission::create(['name' => 'Ver rol'])->syncRoles($super_admin);
        Permission::create(['name' => 'Editar roles'])->syncRoles($super_admin);
        Permission::create(['name' => 'Actualizar roles'])->syncRoles($super_admin);
        Permission::create(['name' => 'Eliminar roles'])->syncRoles($super_admin);

        // ======================= PERMISOS =======================
        Permission::create(['name' => 'Ver permisos'])->syncRoles($super_admin);
        Permission::create(['name' => 'Actualizar permisos'])->syncRoles($super_admin);

        // ======================= USUARIOS =======================
        Permission::create(['name' => 'Listado de usuarios'])->syncRoles($super_admin);
        Permission::create(['name' => 'Crear usuarios'])->syncRoles($super_admin);
        Permission::create(['name' => 'Guardar usuarios'])->syncRoles($super_admin);
        Permission::create(['name' => 'Ver usuario'])->syncRoles($super_admin);
        Permission::create(['name' => 'Editar usuarios'])->syncRoles($super_admin);
        Permission::create(['name' => 'Actualizar usuarios'])->syncRoles($super_admin);
        Permission::create(['name' => 'Eliminar usuarios'])->syncRoles($super_admin);
        Permission::create(['name' => 'Restaurar usuarios'])->syncRoles($super_admin);

        // ======================= CATEGORIAS =======================
        Permission::create(['name' => 'Listado de categorias'])->syncRoles($super_admin);
        Permission::create(['name' => 'Crear categorias'])->syncRoles($super_admin);
        Permission::create(['name' => 'Guardar categorias'])->syncRoles($super_admin);
        Permission::create(['name' => 'Ver categoria'])->syncRoles($super_admin);
        Permission::create(['name' => 'Editar categorias'])->syncRoles($super_admin);
        Permission::create(['name' => 'Actualizar categorias'])->syncRoles($super_admin);
        Permission::create(['name' => 'Eliminar categorias'])->syncRoles($super_admin);

        // ======================= PRODUCTOS =======================
        Permission::create(['name' => 'Listado de productos'])->syncRoles($super_admin);
        Permission::create(['name' => 'Crear productos'])->syncRoles($super_admin);
        Permission::create(['name' => 'Guardar productos'])->syncRoles($super_admin);
        Permission::create(['name' => 'Ver producto'])->syncRoles($super_admin);
        Permission::create(['name' => 'Editar productos'])->syncRoles($super_admin);
        Permission::create(['name' => 'Actualizar productos'])->syncRoles($super_admin);
        Permission::create(['name' => 'Eliminar productos'])->syncRoles($super_admin);

        // ======================= IMAGENES PRODUCTOS =======================
        Permission::create(['name' => 'Ver imagenes de productos'])->syncRoles($super_admin);
        Permission::create(['name' => 'Subir imagenes de productos'])->syncRoles($super_admin);
        Permission::create(['name' => 'Eliminar imagenes de productos'])->syncRoles($super_admin);

        // ======================= PEDIDOS =======================
        Permission::create(['name' => 'Listado de pedidos'])->syncRoles($super_admin);
        Permission::create(['name' => 'Crear Pedido'])->syncRoles($super_admin);
        Permission::create(['name' => 'Procesar pedido'])->syncRoles($super_admin);

        // ======================= WEB PUBLICA =======================
        /* Permission::create(['name' => 'Ver pagina principal']);
        Permission::create(['name' => 'Ver detalle producto']);
        Permission::create(['name' => 'Ver dashboard usuario']);
        Permission::create(['name' => 'Ver ajustes usuario']);
        Permission::create(['name' => 'Actualizar informacion personal']);
        Permission::create(['name' => 'Actualizar password']);
        Permission::create(['name' => 'Ver mis ventas']);
        Permission::create(['name' => 'Buscar productos']); */

        // ======================= CARRITO =======================
        /* Permission::create(['name' => 'Ver carrito']);
        Permission::create(['name' => 'Agregar al carrito']);
        Permission::create(['name' => 'Actualizar carrito']);
        Permission::create(['name' => 'Eliminar del carrito']);
        Permission::create(['name' => 'Vaciar carrito']);*/

        // ======================= FAVORITOS =======================
        /* Permission::create(['name' => 'Ver favoritos']);
        Permission::create(['name' => 'Agregar favoritos']);
        Permission::create(['name' => 'Eliminar favoritos']);*/

        // ======================= LOGIN Y REGISTRO =======================
        /*Permission::create(['name' => 'Ver login web']);
        Permission::create(['name' => 'Procesar login web']);
        Permission::create(['name' => 'Ver registro web']);
        Permission::create(['name' => 'Crear cuenta web']);*/

        // ======================= PAYPAL =======================
        /*Permission::create(['name' => 'Pagar con paypal']);
        Permission::create(['name' => 'Ver gracias paypal']);
        Permission::create(['name' => 'Completar orden paypal']);
        Permission::create(['name' => 'Cancelar pago paypal']);*/ 
        

    }
}
