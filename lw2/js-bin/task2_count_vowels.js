function countVowels(s) {
    let res = [];
    if (typeof(s) == 'string') {
        for (const c of s) {
            if (isVowel(c)) res.push(c);
        }

        return res;
    }

    return s + ' не строка';
}

function isVowel(c) {
    return ['а', 'е', 'ё', 'и', 'о', 'у', 'ы', 'э', 'ю', 'я'].includes(c);
}

console.log(countVowels('Привет, мир!'));
console.log(countVowels('ппппппп'));
console.log(countVowels(15));