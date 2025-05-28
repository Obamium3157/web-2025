{
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.querySelector('.modal');
        const modalImg = document.querySelector('.modal-image-wrapper__content');
        const closeBtn = document.querySelector('.modal__close');

        const prevButton = document.querySelector('.modal-slider__button-prev');
        const nextButton = document.querySelector('.modal-slider__button-next');

        // const button_organizer = document.querySelector('.button-organizer');

        let currentIndex = 0;
        let imageList = [];

        document.querySelectorAll('.post-img-container__post-content-img').forEach(img => {
            img.addEventListener('click', (e) => {
                const clickedImage = e.target;
                const postImages = Array.from(clickedImage.closest('.post-img-container').querySelectorAll('.post-img-container__post-content-img'));

                imageList = postImages.map(img => img.src);
                currentIndex = postImages.indexOf(clickedImage);

                modal.classList.remove('hidden');
                modalImg.src = img.src;
            });
        });

        function updateModalContent() {
            modalImage.src = imageList[currentIndex];
            modalCounter.textContent = `${currentIndex + 1} из ${imageList.length}`;
            updateButtons();
        }



        prevButton.addEventListener('click', () => {
            alert('helo prev!!!!!');
        });

        nextButton.addEventListener('click', () => {
            alert('helo next!!!!!');
        });

        closeBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            modalImg.src = '';
        });

        window.addEventListener('click', (e) => {
            if (e.target == modal) {
                modal.classList.add('hidden');
                modalImg.src = '';
            }
        });
    });
}