function triple_and_filter(arr) {
    return arr.map(x => x * 3).filter(x => x > 10);
}

console.log(triple_and_filter([2, 5, 8, 10, 3]));