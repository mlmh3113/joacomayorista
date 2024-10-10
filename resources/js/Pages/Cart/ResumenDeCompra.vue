<script setup>
import { computed, onMounted } from 'vue';
import { useCarritoStore } from '@/stores/carritoStore';
import { useProcesoDeCompraStore } from '@/stores/procesoDeCompraStore';

const carritoStore = useCarritoStore();
const procesoDeCompra = useProcesoDeCompraStore();

// Calcula el total de los productos en el carrito
const totalProductos = computed(() => {
    return carritoStore.productos.reduce((total, producto) => {
        const precio = Number(producto.precio) || 0; // Verifica que sea un número
        const descuento = Number(producto.descuento) || 0; // Verifica que sea un número
        const cantidad = Number(producto.cantidad) || 0; // Verifica que sea un número
        const precioConDescuento = precio - (precio * (descuento / 100));
        return total + (precioConDescuento * cantidad);
    }, 0);
});

// Calcula el total de descuentos
const totalDescuentos = computed(() => {
    return carritoStore.productos.reduce((total, producto) => {
        const precio = Number(producto.precio) || 0; // Verifica que sea un número
        const descuento = Number(producto.descuento) || 0; // Verifica que sea un número
        const cantidad = Number(producto.cantidad) || 0; // Verifica que sea un número
        const descuentoPorProducto = precio * (descuento / 100) * cantidad;
        return total + descuentoPorProducto;
    }, 0);
});

// Establece el total de descuentos en el store al cargar el componente
onMounted(() => {
    procesoDeCompra.setTotalDescuentos(totalDescuentos.value);
});

// Calcula el total de la compra incluyendo el costo de envío
const totalCompra = computed(() => {
    const costoEnvio = procesoDeCompra.getCostoEnvio() || 0; // Verifica que sea un número
    return totalProductos.value + costoEnvio;
});
</script>

<template>


    <div class="flex flex-col w-full max-w-2xl mx-auto p-5 bg-white rounded-md shadow-md">
        <h2 class="text-2xl font-bold mb-5">Resumen de Compra</h2>

        <h3 class="text-xl font-semibold mb-3">Datos del Comprador</h3>
        <p><strong>Nombre:</strong> {{ procesoDeCompra.getNombre() }}</p>
        <p><strong>Apellido:</strong> {{ procesoDeCompra.getApellido() }}</p>
        <p><strong>Email:</strong> {{ procesoDeCompra.getEmail() }}</p>
        <p><strong>Teléfono:</strong> {{ procesoDeCompra.getTelefono() }}</p>
        <p><strong>DNI:</strong> {{ procesoDeCompra.getDni() }}</p>

        <h3 class="text-xl font-semibold mt-5 mb-3">Datos de Domicilio</h3>
        <p><strong>Dirección:</strong> {{ procesoDeCompra.getDireccion() }}</p>
        <p><strong>Localidad:</strong> {{ procesoDeCompra.getLocalidad() }}</p>
        <p><strong>Provincia:</strong> {{ procesoDeCompra.getProvincia() }}</p>
        <p><strong>Código Postal:</strong> {{ procesoDeCompra.getCodigoPostal() }}</p>

        <h3 class="text-xl font-semibold mt-5 mb-3">Productos en el Carrito</h3>
        <table class="min-w-full border-collapse border border-gray-200">
            <thead>
                <tr>
                    <th class="border border-gray-200 p-2 text-left">Nombre</th>
                    <th class="border border-gray-200 p-2 text-left">Precio</th>
                    <th class="border border-gray-200 p-2 text-left">Descuento</th>
                    <th class="border border-gray-200 p-2 text-left">Cantidad</th>
                    <th class="border border-gray-200 p-2 text-left">Valor del Descuento</th>
                    <th class="border border-gray-200 p-2 text-left">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="producto in carritoStore.productos" :key="producto.id">
                    <td class="border border-gray-200 p-2 capitalize">{{ producto.nombre }}</td>
                    <td class="border border-gray-200 p-2">${{ Number(producto.precio).toFixed(2) }}</td>
                    <td class="border border-gray-200 p-2">{{ producto.descuento }}%</td>
                    <td class="border border-gray-200 p-2">{{ producto.cantidad }}</td>
                    <td class="border border-gray-200 p-2">$-{{ 
                        (Number(producto.precio) * (producto.descuento / 100) * producto.cantidad).toFixed(2) 
                    }}</td>
                    <td class="border border-gray-200 p-2">${{ 
                        ((Number(producto.precio) - (Number(producto.precio) * (producto.descuento / 100))) * producto.cantidad).toFixed(2) 
                    }}</td>
                </tr>
            </tbody>
        </table>

        <div v-if="carritoStore.productos.some(producto => isNaN(producto.precio) || isNaN(producto.descuento) || isNaN(producto.cantidad))" class="text-red-500 mt-2">
            <p>Hay un problema con los datos de los productos en el carrito.</p>
        </div>

        <div class="mt-5">
            <h3 class="text-xl font-semibold">Total Descuentos: ${{ 
                Number(procesoDeCompra.getTotalDescuentos()).toFixed(2) || '0.00' 
            }}</h3>
            <h3 class="text-xl font-semibold">Costo de Envío: ${{ 
                Number(procesoDeCompra.getCostoEnvio()).toFixed(2) || '0.00' 
            }}</h3>
            <h3 class="text-xl font-semibold mt-2">Total: ${{ 
                Number(totalCompra).toFixed(2) || '0.00' 
            }}</h3>
        </div>
    </div>
</template>

<style scoped>
</style>
