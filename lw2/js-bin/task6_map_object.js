function mapObject(obj, callback) {
    return Object.keys(obj).map((key) => {
        return callback(obj[key]);
    })
}

console.log(mapObject({ a: 1, b: 2, c: 3 }, x => x * 3));