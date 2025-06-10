{
    document.addEventListener('DOMContentLoaded', () => {
        const postContainers = document.querySelectorAll('.post-img-container');

        postContainers.forEach(container => {
            const images = container.querySelectorAll('.post-img-container__post-content-img');
            const prevButton = container.querySelector('.slider__button-prev');
            const nextButton = container.querySelector('.slider__button-next');
            const counter = container.querySelector('.counter__text');

            let currentIndex = 0;

            function updateImage() {
                images.forEach((img, index) => {
                    img.classList.toggle('active', index === currentIndex)
                });

                if (counter) {
                    counter.textContent = `${currentIndex + 1}/${images.length}`;
                }
            }

            if (prevButton) {
                prevButton.addEventListener('click', () => {
                    currentIndex = (currentIndex - 1 + images.length) % images.length;
                    updateImage();
                });
            }

            if (nextButton) {
                nextButton.addEventListener('click', () => {
                    currentIndex = (currentIndex + 1) % images.length;
                    updateImage();
                });
            }

            updateImage();
        });
    });

}