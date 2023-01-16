import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])
// Swal Modal
import Swal from 'sweetalert2/dist/sweetalert2.js';

import 'sweetalert2/src/sweetalert2.scss';


//modal 
const delButtons = document.getElementsByClassName('my-delete');
console.log(delButtons);
for (let i=0; i<delButtons.length; i++){
// delButtons.forEach(delButton => {
    delButtons[i].addEventListener('click',(event)=>{
        event.preventDefault();
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-primary mx-2 fw-bold',
              cancelButton: 'btn btn-secondary mx-2 fw-bold'
            },
            buttonsStyling: false
          })
          
          swalWithBootstrapButtons.fire({
            background: '#1e1e1e',
            color: '#ededed',
            title: 'Are you sure?',
            text:  "You won't be able to revert this!",
            icon: 'warning',
            iconColor: '#D2DE44',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire({
                    background: '#1e1e1e',
                    timer: 3000,
                    color: '#ededed',
                    title: 'Deleted!',
                    text: 'Your file has been deleted.',
                    icon:'success',
                    showConfirmButton: false,
                })
                setTimeout(()=>{delButtons[i].parentElement.submit()},3000);
            } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire({
                timer: 2000,
                background: '#1e1e1e',
                color: '#ededed',
                title: 'Cancelled',
                text: 'Your imaginary file is safe',
                icon:'error',
                showConfirmButton: false,

              }
              )
            }
          })




    })
    
};

// img preview
const previewImage = document.getElementById('overview_image');
previewImage.addEventListener('change', (event) =>{
    var oFReader = new FileReader();
    // var image  =  previewImage.files[0];
    // console.log(image);
    oFReader.readAsDataURL(previewImage.files[0]);

    oFReader.onload = function (oFREvent) {
        //console.log(oFREvent);
        document.getElementById("uploadPreview").src = oFREvent.target.result;
        document.getElementById("uploadPreview").classList.replace('d-none', 'd-block')
    };
});