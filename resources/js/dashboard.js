document.addEventListener('DOMContentLoaded', function () {
    document.addEventListener('keydown', function (e) {
        if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') {
            e.preventDefault();
            const input = document.querySelector('header input[type="text"]');
            if (input) input.focus();
        }
    });
});
