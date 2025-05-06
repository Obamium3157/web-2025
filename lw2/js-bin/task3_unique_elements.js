function uniqueElements(arr) {
    const result = {};
    for (const el of arr) {
        if (result.hasOwnProperty(el)) {
            result[el]++;
        } else {
            result[el] = 1;
        }
        
    }

    return result;
}

console.log(uniqueElements(['hello', 15, 9, 'hello', '9']));