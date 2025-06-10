document.addEventListener('DOMContentLoaded', () => {
    const modal = document.querySelector('.modal');
    const modalImg = document.querySelector('.modal-image-wrapper__content');
    const closeBtn = document.querySelector('.modal-image-wrapper__close');

    const prevButton = document.querySelector('.modal-slider__button-prev');
    const nextButton = document.querySelector('.modal-slider__button-next');
    const modalCounter = document.querySelector('.modal-image-wrapper__counter-text');

    let currentIndex = 0;
    let imageList = [];

    let escapeKeyHandler = null;
    let overlayClickHandler = null;
    let prevClickHandler = null;
    let nextClickHandler = null;
    let closeBtnHandler = null;

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

            escapeKeyHandler = (e) => {
                if (e.key === 'Escape') closeModal();
            };
            overlayClickHandler = (e) => {
                if (e.target === modal) closeModal();
            };
            prevClickHandler = () => {
                currentIndex = (currentIndex - 1 + imageList.length) % imageList.length;
                updateModalContent();
            };
            nextClickHandler = () => {
                currentIndex = (currentIndex + 1) % imageList.length;
                updateModalContent();
            };
            closeBtnHandler = closeModal;

            window.addEventListener('keydown', escapeKeyHandler);
            window.addEventListener('click', overlayClickHandler);
            prevButton.addEventListener('click', prevClickHandler);
            nextButton.addEventListener('click', nextClickHandler);
            closeBtn.addEventListener('click', closeBtnHandler);
        });
    });

    function updateModalContent() {
        modalImg.src = imageList[currentIndex];
        modalCounter.textContent = `${currentIndex + 1} из ${imageList.length}`;
    }

    function closeModal() {
        modal.classList.add('hidden');
        modalImg.src = '';

        if (escapeKeyHandler) window.removeEventListener('keydown', escapeKeyHandler);
        if (overlayClickHandler) window.removeEventListener('click', overlayClickHandler);
        if (prevClickHandler) prevButton.removeEventListener('click', prevClickHandler);
        if (nextClickHandler) nextButton.removeEventListener('click', nextClickHandler);
        if (closeBtnHandler) closeBtn.removeEventListener('click', closeBtnHandler);

        escapeKeyHandler = null;
        overlayClickHandler = null;
        prevClickHandler = null;
        nextClickHandler = null;
        closeBtnHandler = null;
    }
});
