@extends('layouts.app')

@php
    $navActive = 'carrito';
    $footerFollowLabel = 'Siguenos';
@endphp

@section('title', 'Carrito | Maylu Store')

@section('styles')
    @vite(['resources/css/carrito.css'])
@endsection

@section('content')
    <section class="cart-section">
        <div class="container">
            <h2>Tu carrito</h2>
            <p class="cart-subtitle">Resumen de productos agregados.</p>

            <p id="cartEmpty" class="cart-empty">Tu carrito esta vacio.</p>

            <div id="cartTableWrapper" class="cart-table-wrapper">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Talla</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="cartBody"></tbody>
                </table>

                <div class="cart-summary">
                    <span>Total</span>
                    <strong id="cartTotal"></strong>
                </div>

                <button id="checkoutButton" class="checkout-button" type="button">Pagar</button>
            </div>

            <div id="checkoutSection" class="checkout-section is-hidden">
                <h3>Datos de envio y pago</h3>
                <form id="checkoutForm" novalidate>
                    <div class="field-group">
                        <label for="firstName">Nombre</label>
                        <input id="firstName" type="text" autocomplete="given-name" required>
                        <span class="field-error" data-error-for="firstName"></span>
                    </div>

                    <div class="field-group">
                        <label for="lastName">Apellido</label>
                        <input id="lastName" type="text" autocomplete="family-name" required>
                        <span class="field-error" data-error-for="lastName"></span>
                    </div>

                    <div class="field-group">
                        <label for="documentType">Tipo de documento</label>
                        <select id="documentType" required>
                            <option value="">Selecciona una opcion</option>
                            <option value="CC">CC</option>
                            <option value="PP">PP</option>
                            <option value="CE">CE</option>
                        </select>
                        <span class="field-error" data-error-for="documentType"></span>
                    </div>

                    <div class="field-group">
                        <label for="barrio">Barrio</label>
                        <input id="barrio" type="text" autocomplete="address-level2" required>
                        <span class="field-error" data-error-for="barrio"></span>
                    </div>

                    <div class="field-group">
                        <label for="address">Direccion</label>
                        <input id="address" type="text" autocomplete="street-address" required>
                        <span class="field-error" data-error-for="address"></span>
                    </div>

                    <div class="field-group">
                        <span class="field-label">Metodo de pago</span>
                        <div class="radio-group">
                            <label>
                                <input type="radio" name="paymentMethod" value="transferencia">
                                Transferencia
                            </label>
                            <label>
                                <input type="radio" name="paymentMethod" value="tarjeta">
                                Tarjeta debito/credito
                            </label>
                        </div>
                        <span class="field-error" data-error-for="paymentMethod"></span>
                    </div>

                    <div class="field-group">
                        <label class="checkbox-label">
                            <input id="terms" type="checkbox" required>
                            Acepta los terminos y condiciones
                        </label>
                        <span class="field-error" data-error-for="terms"></span>
                    </div>

                    <button type="submit" class="checkout-submit">Enviar</button>
                    <p id="checkoutMessage" class="checkout-message" role="status" aria-live="polite"></p>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @vite(['resources/js/cart.js', 'resources/js/partials.js'])
@endsection
