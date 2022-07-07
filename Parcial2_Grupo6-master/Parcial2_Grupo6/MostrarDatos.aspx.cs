using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace Parcial2_Grupo6
{
    public partial class MostrarDatos : System.Web.UI.Page
    {
        private string dniInput;
        private DataLinqClassDataContext instance;
        protected void Page_Load(object sender, EventArgs e)
        {
            instance = new DataLinqClassDataContext();
            dniInput = Request.QueryString["documento"];

            var consultaPorDNI = instance.alumnos.Where(dato => dato.dni_alumno.ToString() == dniInput).Select(datos => datos);

            foreach (var consulta in consultaPorDNI) {
                txtNombre.Text = consulta.nombre_alumno;
                txtApellido.Text = consulta.apellido_alumno;
                txtDocumento.Text = consulta.dni_alumno.ToString();
                txtEmail.Text = consulta.email_alumno;
                txtTurno.Text = consulta.turno_alumno;
            }
        }

        protected void Enviar_Click(object sender, EventArgs e)
        {
            comentario comentarios = new comentario
            {
                dni_alumno = Convert.ToInt32(txtDocumento.Text),
                apellido_alumno = txtApellido.Text,
                comentario_alumno = txtComentario.Text
            };

            instance.comentarios.InsertOnSubmit(comentarios);
            instance.SubmitChanges();

            Response.Redirect("ingresoAlumnos.aspx");
        }
    }
}