// Дано:
//
// table .c { color: red }
// .a .c { color: green }
//
//
// <table id="t">
//     <tr>
//     <td class="c">Текст</td>
//     </tr>
// </table>
//
// Задача: написать JavaScript код, делающий "Текст" зелёным, предложите как минимум три варианта (можно больше) (1-2 могут использовать JS библиотеки) только самого кода (копировать задание в ответ не нужно).

$('#t').addClass('a');
document.getElementById('t').className = 'a';

$('table').addClass('a');
document.getElementsByTagName('table')['0'].className = 'a';

$('.c').css('color', 'green');
document.getElementsByClassName('c')['0'].style.color = 'green';

setInterval(function () {
    let t = $('#t');

    if (t.hasClass('a')) {
        t.removeClass('a');
    } else {
        t.addClass('a');
    }
}, 500);