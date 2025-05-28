const users = [
    { id: 1, name: "Alice" },
    { id: 2, name: "Bob" },
    { id: 3, name: "Charlie" },
    // { id: 4 },
];

function get_obj_values(users) {
    return users.map(function (obj) {
        return obj["name"]
    });
}

console.log(get_obj_values(users));