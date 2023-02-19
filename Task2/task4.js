// // Код задания
// for (var i = 0; i < 10; i++) {
//     setTimeout(function () {
//         console.log(i)
//     }, 0)
// }

// // Решение 1
// for (i = 0; i < 10; i++) {
//     console.log(i)
// }

// Решение 2
for (i = 0; i < 10; i++) {
  setTimeout(
    function foo(n) {
      console.log(n);
    },
    0,
    i
  );
}
