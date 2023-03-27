<template>
    <div>
    
    </div>
    </template>
    <script>
    export default {
      props: ["errors", "error", "success"],
      data() {
        return {};
      },
      created() {
        this.displayMessage();
      },
      methods: {
        displayMessage() {
          if (typeof this.success != 'undefined') {
           

            $(document).Toasts('create', {
        title: 'ADEO',
        position: 'topLeft',
        body: this.success
      })

          }
    
          if (typeof this.error != 'undefined') {
            // $.toast({
            //     heading: 'Turkana Portal : Error',
            //     text: this.error,
            //     position: 'top-right',
            //     loaderBg:'#ff6849',
            //     icon: 'warning',
            //     hideAfter: 3500,
            //     stack: 6
            //   });

              $(document).Toasts('create', {
        title: 'ADEO',
        position: 'topLeft',
        body: this.error
      })

          }
    
          if (typeof this.errors != 'undefined') {
            this.errors.forEach((error) => {

            //   $.toast({
            //     heading: "Turkana Portal : Error",
            //     text: error,
            //     position: "top-right",
            //     loaderBg: "#ff6849",
            //     icon: "error",
            //     hideAfter: 3500,
            //     stack: 6,
            //   });
              $(document).Toasts('create', {
        title: 'ADEO',
        position: 'topLeft',
        body: error
      })

            });
          }
        },
      },
    };
    </script>
    <style scoped>
    
    </style>