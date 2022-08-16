$(document).ready(function () {
    //Input Tarikh
    jalaliDatepicker.startWatch({
        dayRendering:function(dayOptions,input){
            return {
                isHollyDay: dayOptions.month==1 && dayOptions.day<=4,
                // isValid = false, امکان غیر فعال کردن روز
                // className = "nowruz" امکان افزودن کلاس برای درج استایل به روز
            }
        }
    })
})
