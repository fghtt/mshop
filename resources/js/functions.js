export function setNull(obj) {
    let newObj = {}
    for (let key in obj) {
        newObj[key] = null
    }

    return newObj
}

export function is_equivalence(obj1, obj2) {
    for (let key in obj2) {
        console.log(obj1[key], obj2[key])
        if( obj1[key] !== obj2[key]) {
            return false
        }
    }

    return true
}
