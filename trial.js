function openScrollPanel() {
    document.getElementById('scroll-panel').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}

function closeScrollPanel() {
    document.getElementById('scroll-panel').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

// explore campus 
document.getElementById('exploreButton').addEventListener('click', openScrollPanel);
document.getElementById('closeButton').addEventListener('click', closeScrollPanel);

document.getElementById('navigation-form').addEventListener('submit', function (event) {
    event.preventDefault();
    const currentLocation = document.getElementById('current-location').value;
    const destination = document.getElementById('destination').value;
    const result = document.getElementById('result');
    if (currentLocation === destination) {
        result.textContent = 'You are already at your destination.';
    } else {
        const distance = Math.floor(Math.random() * 10) + 1;
        const time = Math.floor(Math.random() * 15) + 10;
        result.textContent = `Distance: ${distance} km
Time: ${time} min`;
    }
});
