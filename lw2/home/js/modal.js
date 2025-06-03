{
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.querySelector('.modal');
        const modalImg = document.querySelector('.modal-image-wrapper__content');
        const closeBtn = document.querySelector('.modal-image-wrapper__close');

        const prevButton = document.querySelector('.modal-slider__button-prev');
        const nextButton = document.querySelector('.modal-slider__button-next');
        const modalCounter = document.querySelector('.modal-image-wrapper__counter-text');

        let currentIndex = 0;
        let imageList = [];

        document.querySelectorAll('.post-img-container__post-content-img').forEach(img => {
            img.addEventListener('click', (e) => {
                const clickedImage = e.target;
                const postImages = Array.from(clickedImage.closest('.post-img-container').querySelectorAll('.post-img-container__post-content-img'));

                imageList = postImages.map(img => img.src);
                currentIndex = postImages.indexOf(clickedImage);
                updateModalContent();

                modal.classList.remove('hidden');
                modalImg.src = img.src;

                if (imageList.length <= 1) {
                    prevButton.classList.add('hidden');
                    nextButton.classList.add('hidden');
                    modalCounter.classList.add('hidden');
                } else {
                    prevButton.classList.remove('hidden');
                    nextButton.classList.remove('hidden');
                    modalCounter.classList.remove('hidden');
                }
            });
        });



        function updateModalContent() {
            modalImg.src = imageList[currentIndex];
            modalCounter.textContent = `${currentIndex + 1} из ${imageList.length}`;
        }

        prevButton.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + imageList.length) % imageList.length;
            updateModalContent();
        });

        nextButton.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % imageList.length;
            updateModalContent();
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

        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });

        function closeModal() {
            modal.classList.add('hidden');
            modalImg.src = '';
        }
    });
}