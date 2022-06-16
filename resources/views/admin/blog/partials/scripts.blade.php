<script>
    (function(){
        $('#published_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            sideBySide: true,
            date: '{{ $model-> published_at}}'

        });
    })();
</script>

<script>
image.onchange = evt => {
  const [file] = image.files
  if (file) {
    prview.style.visibility = 'visible';

    prview.src = URL.createObjectURL(file)
  }
}
</script>
