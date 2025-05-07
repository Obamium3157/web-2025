function generatePassword(length = 12) {
    const lowercase = 'abcdefghijklmnopqrstuvwxyz';
    const uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const numbers = '0123456789';
    const specials = '!@#$%^&*()_+-=[]{}|;:,.<>?';

    const passwordParts = [
        getRandomChar(lowercase),
        getRandomChar(uppercase),
        getRandomChar(numbers),
        getRandomChar(specials)
    ];

    const allChars = lowercase + uppercase + numbers + specials;
    for (let i = 4; i < length; i++) {
        passwordParts.push(getRandomChar(allChars));
    }

    return shuffleArray(passwordParts).join('');
}
  
function getRandomChar(characters) {
    return characters[Math.floor(Math.random() * characters.length)];
}

function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

console.log(generatePassword());