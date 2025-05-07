function mergeObjects(obj1, obj2) {
    // result = obj1;
    // for (let el in obj2) {
    //     result[el] = obj2[el];
    // }

    // return result;
    return { ... obj1, ... obj2 }
}

console.log(mergeObjects({name: 'Peter', age: 28}, {favourite_game: 'Cruelty Squad', age: 18, busy: true}));