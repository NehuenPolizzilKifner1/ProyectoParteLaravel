<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 style="font-size:24px;margin-bottom:20px;">
                        Bienvenido {{ Auth::user()->name }}
                    </h2>

                    <p style="margin-bottom:20px;">
                        Panel de administración del ecommerce de vehículos de lujo.
                    </p>

                    <div style="display:flex;gap:15px;flex-wrap:wrap;">

                        <a href="/admin/products" style="padding:12px 20px; background:#2563eb; color:white; text-decoration:none; border-radius:8px;">
                            Gestionar Vehículos
                        </a>

                        <a href="/import-products"
                           style="padding:12px 20px;
                                  background:#16a34a;
                                  color:white;
                                  text-decoration:none;
                                  border-radius:8px;">
                            Importar Excel
                        </a>

                        <a href="/api/products"
                           target="_blank"
                           style="padding:12px 20px;
                                  background:#ea580c;
                                  color:white;
                                  text-decoration:none;
                                  border-radius:8px;">
                            Ver API JSON
                        </a>

                        
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
