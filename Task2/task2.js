let arr = [
  {
    name: "Vasya",
    class: 6,
    mark: 3,
  },
  {
    name: "Oleg",
    class: 6,
    mark: 5,
  },
  {
    name: "Misha",
    class: 6,
    mark: 4,
  },
  {
    name: "Dima",
    class: 5,
    mark: 5,
  },
  {
    name: "Sergey",
    class: 5,
    mark: 5,
  },
  {
    name: "Olga",
    class: 5,
    mark: 4,
  },
  {
    name: "Oksana",
    class: 7,
    mark: 5,
  },
  {
    name: "Mikola",
    class: 7,
    mark: 5,
  },
  {
    name: "Taras",
    class: 7,
    mark: 4,
  },
];

// Вывод общего среднего балла
let marks = [];
for (i = 0; i < arr.length; i++) {
  marks.push(arr[i].mark);
}

let average = marks.reduce(function (previousValue, currentValue) {
  return previousValue + currentValue;
});

console.log("Средний балл по школе: " + average / arr.length);

// Группировка средних баллов по группам
let classes = [];

arr.forEach((arr) => classes.push(arr.class));
let newSet = new Set(classes);
let uniqueNumbers = Array.from(newSet);

let students = [];

for (let i = 0; i < uniqueNumbers.length; i++) {
  students.push({
    class: 0,
    classmates: [],
    averageMarks: [],
  });
}

for (let i = 0; i < uniqueNumbers.length; i++) {
  for (let j = 0; j < classes.length; j++) {
    if (uniqueNumbers[i] === arr[j].class) {
      students[i].class = uniqueNumbers[i];
      students[i].classmates.push(arr[j]);
      students[i].averageMarks.push(arr[j].mark);
    }
  }
}

console.log("Средние оценки учащихся сгруппированные по классу: ", students);

// Топ5 крутышек-отличников отсортированный по алфавиту
arr.sort(function (a, b) {
  if (a.name > b.name) {
    return 1;
  }
  if (a.name < b.name) {
    return -1;
  }
  return 0;
});

arr.sort(function (a, b) {
  return b.mark - a.mark;
});

let topFive = [];
for (i = 0; i < 5; i++) {
  topFive.push(arr[i]);
}
console.log("Пятёрка лучших учеников: ", topFive);
