var obj1 = {
  firstName: "Vasya",
  lastName: "Pupkin",
};

var obj2 = {
  firstName: "Vasya",
  lastName: "Pupkin",
};

var obj3 = {
  firstName: "Vasya",
  lastName: "Pupkin",
  father: {
    firstName: "Ivan",
    lastName: "Pupkin",
  },
};

var obj4 = {
  firstName: "Vasya",
  lastName: "Pupkin",
  father: {
    firstName: "Renat",
    lastName: "Alimov",
  },
};

function deepEqual(obj1, obj2) {
  return JSON.stringify(obj1) === JSON.stringify(obj2);
}

console.log(deepEqual(obj3, obj4));

obj4.father.firstName = "Ivan";
obj4.father.lastName = "Pupkin";

console.log(deepEqual(obj3, obj4));
