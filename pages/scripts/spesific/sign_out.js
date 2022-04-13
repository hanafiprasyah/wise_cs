function signOut() {
    Swal.fire({
        title: 'Do you want to logout?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sure',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed && result.value == true) {
            window.location.href = "../../database/configures/logout_config.php"
        } else {
            return;
        }
    })
}