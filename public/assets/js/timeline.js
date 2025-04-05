document.addEventListener('DOMContentLoaded', () => {
    const events = document.querySelectorAll('.timeline-event');
    events.forEach(event => {
        event.addEventListener('mouseenter', () => {
            event.querySelector('.content').style.backgroundColor = '#e0f7fa';
        });
        event.addEventListener('mouseleave', () => {
            event.querySelector('.content').style.backgroundColor = '#f4f4f4';
        });
    });
});
