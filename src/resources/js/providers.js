document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('category_filter');
    form.setAttribute('action', window.location.href);
    form.addEventListener('submit',function (ev){
        ev.preventDefault()
        const action = form.getAttribute('action');
        window.location.replace(action)
    })
    const checkboxes = document.querySelectorAll('.category-checkbox');
    const checkboxHandlers = [];

    checkboxes.forEach(function (checkbox) {
        const handler = function () {
            const selected = Array.from(checkboxes)
                .filter(i => i.checked)
                .map(i => i.value);

            const params = new URLSearchParams(window.location.search);
            if (selected.length > 0) {
                params.set('categories', selected.join(','));
            } else {
                params.delete('categories');
            }

            const newUrl = window.location.pathname + '?' + params.toString();
            console.log({newUrl})
            form.setAttribute('action', newUrl);
        };

        checkbox.addEventListener('change', handler);
        checkboxHandlers.push({ element: checkbox, handler: handler });
    });

    window.addEventListener('beforeunload', function () {
        checkboxHandlers.forEach(({ element, handler }) => {
            element.removeEventListener('change', handler);
        });
    });
});
