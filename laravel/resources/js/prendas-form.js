const form = document.querySelector('[data-prenda-form]');

if (form) {
    const sizeInputs = Array.from(form.querySelectorAll('input[name="tallas[]"]'));
    const sizeError = form.querySelector('[data-size-error]');
    const firstCheckbox = sizeInputs[0] || null;

    const validateSizes = () => {
        const hasSelection = sizeInputs.some((input) => input.checked);

        if (firstCheckbox) {
            firstCheckbox.setCustomValidity(hasSelection ? '' : 'Selecciona al menos una talla.');
        }

        if (sizeError) {
            sizeError.textContent = hasSelection ? '' : 'Selecciona al menos una talla.';
        }
    };

    sizeInputs.forEach((input) => {
        input.addEventListener('change', validateSizes);
    });

    form.addEventListener('submit', () => {
        validateSizes();
    });
}
