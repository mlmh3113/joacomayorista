import { defineStore } from "pinia";

export const useCarritoStore = defineStore("carrito", {
    state: () => ({
        productos: JSON.parse(localStorage.getItem('productos')) || [],
    }),
    actions: {
        agregarAlCarrito(producto, cantidad) {
            const indexExisteProducto = this.productos.findIndex(p => p.id === producto.id);

            if (indexExisteProducto !== -1) {
                // Si el producto ya existe, solo se actualiza la cantidad
                this.productos[indexExisteProducto].cantidad += cantidad;
            } else {
                // Si el producto no existe, se agrega un nuevo objeto
                this.productos.push({
                    id: producto.id,
                    cantidad: cantidad,
                    nombre: producto.name,
                    precio: producto.price,
                });
            }

            // Guardar los productos actualizados en el localStorage
            localStorage.setItem('productos', JSON.stringify(this.productos));
        },
        
        obtenerTotalCantidad() {
            return this.productos.reduce((total, producto) => total + producto.cantidad, 0);
        },

        obtenerTotalCarrito() {
            return this.productos.reduce((total, producto) => total + (producto.precio * producto.cantidad), 0);
        },

        obtenerProductos() {
            this.productos = JSON.parse(localStorage.getItem('productos')) || [];
        },
        
        vaciarCarrito() {
            this.productos = [];
            localStorage.setItem('productos', JSON.stringify(this.productos));
        },
        
        eliminarDelCarrito(id) {
            const index = this.productos.findIndex(p => p.id === id);
            if (index !== -1) {
                this.productos.splice(index, 1);
                localStorage.setItem('productos', JSON.stringify(this.productos));
            }
        },
        
        actualizarCarrito(id, cantidad) {
            const index = this.productos.findIndex(p => p.id === id);
            if (index !== -1) {
                this.productos[index].cantidad = cantidad;
                localStorage.setItem('productos', JSON.stringify(this.productos));
            }
        },
    },
});
