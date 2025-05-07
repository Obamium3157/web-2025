function isPrimeNumber(x) {
    if (typeof(x) == 'number') {
        for (let i = 2; i <= Math.floor(Math.sqrt(x)); i++) {
            if  (x % i == 0) return false;
        }

        return true;
    }
    else if (x instanceof Array) {
        let res = [];
        x.forEach(el => {
            let flag = false;
            for (let i = 2; i <= Math.floor(Math.sqrt(el)); i++) {
                flag = el % i == 0;
                if (flag) {
                    res.push(false);
                    break;
                }
            }
            if (!flag) {
                res.push(true);
            }
        });

        return res;
    }
    else {
        return false;
    }
}

function parseResult(x, res) {
    if (typeof(x) == 'number') {
        let response = x + ' ' + (res ? '-' : 'не') + ' простое число';
        console.log(response);
    } else if (typeof(x) == 'object' && typeof(res) == 'object') {
        for (i = 0; i < x.length; i++) {
            let response;
            if (typeof(x[i]) == 'number') {
                response = x[i] + ' ' + (res[i] ? '-' : 'не') + ' простое число';
            } else {
                response = x[i] + ' не является ни числом, ни массивом';
            }
            console.log(response);
        }
    } else {
        console.log(x, ' не является ни числом, ни массивом');
    }
}


parseResult({}, isPrimeNumber({}));
parseResult(4, isPrimeNumber(4));
console.log('-------------');
parseResult([2, 3, 4, 5], isPrimeNumber([2, 3, 4, 5]));
console.log('-------------');
parseResult('hey', isPrimeNumber('hey'));
parseResult([5, 'hey', 84], isPrimeNumber([5, 'hey', 84]));