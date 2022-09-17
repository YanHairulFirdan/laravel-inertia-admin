import Swal, { SweetAlertResult } from "sweetalert2";

export function successAlert(message = 'Success'){
  Swal.fire({
    title: 'Success',
    html: message,
    icon: 'success',
    confirmButtonText: 'close'
  })
}

export function errorAlert(message = 'Something wrong'){
  Swal.fire({
    title: 'Error!',
    html: message,
    icon: 'error',
    confirmButtonText: 'close'
  })
}

export function confirmAlert(message = 'Are you sure?') : Promise<SweetAlertResult>{
  return Swal.fire({
    title: message,
    icon: 'question',
    confirmButtonText: 'yes',
    cancelButtonText: 'cancel',
  })
}