const users = [
    { id: 1, name: "Alice" },
    { id: 2, name: "Bob" },
    { id: 3, name: "Charlie" },
    { id: 4 },
];

function get_obj_values(users) {
    const names = users.map(function(obj) {
        if (obj["name"]) obj["name"];
    });

    return names;
}

console.log(get_obj_values(users));