function mapObject(obj, callback) {
    const result = {};
    for (const key in obj) {
        if (obj.hasOwnProperty(key)) {
            result[key] = callback(obj[key]);
        }
    }

    return result;
}

console.log(mapObject({ a: 1, b: 2, c: 3 }, x => x * 3));