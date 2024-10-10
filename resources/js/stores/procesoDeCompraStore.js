import { defineStore } from "pinia";

export const useProcesoDeCompraStore = defineStore("procesoDeCompra", {
    state: () => ({
        nombre: "",
        apellido: "",
        email: "",
        direccion: "",
        localidad: "",
        provincia: "",
        codigoPostal: "",
        telefono: "",
        dni: "",
        costoEnvio: 0, // Estado para el costo de envío
        descuento: 0,   // Estado para el descuento
        total: 0,       // Estado para el total final
        totalDescuentos: 0, // Estado para el total de descuentos
    }),

    actions: {

        setTotalDescuentos(value) {
            this.totalDescuentos = value;
        },

        getTotalDescuentos() {
            return this.totalDescuentos;
        },
        setNombre(value) {
            this.nombre = value;
        },

        getNombre() {
            return this.nombre;
        },

        setApellido(value) {
            this.apellido = value;
        },

        getApellido() {
            return this.apellido;
        },

        setEmail(value) {
            this.email = value;
        },

        getEmail() {
            return this.email;
        },

        setDireccion(value) {
            this.direccion = value;
        },

        getDireccion() {
            return this.direccion;
        },

        setLocalidad(value) {
            this.localidad = value;
        },

        getLocalidad() {
            return this.localidad;
        },

        setProvincia(value) {
            this.provincia = value;
            this.calcularCostoEnvio(); // Calcula el costo de envío cuando se cambia la provincia
        },

        getProvincia() {
            return this.provincia;
        },

        setCodigoPostal(value) {
            this.codigoPostal = value;
        },

        getCodigoPostal() {
            return this.codigoPostal;
        },

        setTelefono(value) {
            this.telefono = value;
        },

        getTelefono() {
            return this.telefono;
        },

        setDni(value) {
            this.dni = value;
        },

        getDni() {
            return this.dni;
        },

        setDescuento(value) {
            this.descuento = value;
        },

        getDescuento() {
            return this.descuento;
        },

        calcularCostoEnvio() {
            // Costo de envío dependiendo de la provincia
            if (this.provincia === "Buenos Aires") {
                this.costoEnvio = 2000;
            } else {
                this.costoEnvio = 4500;
            }
        },

        getCostoEnvio() {
            return this.costoEnvio;
        },

        // Calcular el total final
        calcularTotal(subtotal) {
            this.total = subtotal - this.descuento + this.costoEnvio;
        },

        getTotal() {
            return this.total;
        },

        // Obtener todos los datos de la compra en un objeto
        getCompra() {
            return {
                nombre: this.getNombre(),
                apellido: this.getApellido(),
                email: this.getEmail(),
                direccion: this.getDireccion(),
                localidad: this.getLocalidad(),
                provincia: this.getProvincia(),
                codigoPostal: this.getCodigoPostal(),
                telefono: this.getTelefono(),
                dni: this.getDni(),
                costo_envio: this.getCostoEnvio(),
                descuento: this.getDescuento(),
                total: this.getTotal(),
            };
        },
    },
});
