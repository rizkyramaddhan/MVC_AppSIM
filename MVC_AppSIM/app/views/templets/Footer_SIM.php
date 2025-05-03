
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const sidebar = document.getElementById('sidebar');
  const content = document.getElementById('mainContent');
  const topbar = document.getElementById('topbar');
  const toggleBtn = document.getElementById('toggleSidebar');

  toggleBtn.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
    content.classList.toggle('collapsed');
    topbar.classList.toggle('collapsed');
  });
</script>
</body>
</html>
