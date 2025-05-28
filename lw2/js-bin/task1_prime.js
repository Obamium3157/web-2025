const NOT_PRIME = 0;
const PRIME = 1;
const NOT_A_NUMBER = -1;

function isPrimeNumber(x) {
    if (typeof(x) != 'object') {
        x = [x];
    }

    let res = [];
    for (let i = 0; i < x.length; i++) {
        let retObj = {
            num: x[i],
        }
        retObj['isPrime'] = (typeof (x[i]) == 'number') ? isPrime(x[i]) : NOT_A_NUMBER;
        res.push(retObj);
    }

    return res;
}

function isPrime(x) {
    if (x < 0 || Math.ceil(x) != Math.floor(x)) return NOT_PRIME;

    for (let i = 2; i <= Math.floor(Math.sqrt(x)); i++) {
        if (x % i == 0) return NOT_PRIME;
    }

    return PRIME;
}

function parseResult(resObj) {
    for (const res of resObj) {
        console.log(generateResponse(res));
    }
}

function generateResponse(resObj) {
    const x = resObj['num'];
    const res = resObj['isPrime'];

    if (res == NOT_A_NUMBER) {
        return x + ' не является числом';
    } else {
        return x + ' ' + (res ? '-' : 'не') + ' простое число';
    }
}

parseResult(isPrimeNumber(12.3));
parseResult(isPrimeNumber(-1));
parseResult(isPrimeNumber(15));
parseResult(isPrimeNumber([3, 4, 5]));
parseResult(isPrimeNumber('num'));
parseResult(isPrimeNumber({}));