document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('#logout-btn').addEventListener('click', async () => {
        const res = await fetch('../api/logout.php', {
            method: 'POST'
        });

        if (res.ok) {
            window.location.href = '../login/';
        } else {
            alert('Some error occured');
        }
    });
})