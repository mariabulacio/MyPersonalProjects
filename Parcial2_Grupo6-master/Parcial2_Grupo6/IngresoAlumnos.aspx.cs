using System;
using System.Linq;
using System.Text;
using System.Web.UI.WebControls;

namespace Parcial2_Grupo6
{
    public partial class IngresoAlumnos : System.Web.UI.Page
    {
        private DataLinqClassDataContext instance;

        public bool IsDocumentExists(int dni_alumno) {
            var consultaDNI = instance.alumnos.Where(dni => dni_alumno == dni.dni_alumno).Select(datos => datos);
            return consultaDNI.Any();
        }
        
        //Creamos objeto que cree ventana de alerta
        public void Alert(string msg)
        {
            string sMsg = msg.Replace("\"", "'");
            StringBuilder sb = new StringBuilder();
            sb.Append("<script language='javascript'>");
            sb.Append("alert('" + sMsg + "');");
            sb.Append("</script>");
            string content = sb.ToString();
            ClientScript.RegisterClientScriptBlock(this.GetType(), "AlertMessage", content, false);
        }
        protected void Page_Load(object sender, EventArgs e)
        {
            instance = new DataLinqClassDataContext();

            //Evitamos que recargue el DDL en cada envio
            if (!IsPostBack)
            {
                string[] turnos = { "Mañana", "Tarde", "Noche" };
                ddlTurnos.DataSource = turnos;
                ddlTurnos.DataBind();
                ddlTurnos.Items.Insert(0, new ListItem("Seleccione turno"));
            }
        }

        protected void Enviar_Click(object sender, EventArgs e)
        {
            //Primer revisamos documento existe en DB
            int document = Convert.ToInt32(txtDocumento.Text);
            if (IsDocumentExists(document)) {
                Alert("El documento ingresado ya existe en nuestros registros");
                return;
            }

            alumno alumnos = new alumno
            {
                apellido_alumno = txtApellido.Text,
                nombre_alumno = txtNombre.Text,
                dni_alumno = Convert.ToInt32(txtDocumento.Text),
                email_alumno = txtEmail.Text,
                turno_alumno = ddlTurnos.SelectedItem.Value,
            };

            instance.alumnos.InsertOnSubmit(alumnos);
            instance.SubmitChanges();

            Response.Redirect($"MostrarDatos.aspx?documento={txtDocumento.Text}");
        }

        protected void Listado_Click(object sender, EventArgs e)
        {
            Response.Redirect("ListadoComentarios.aspx");
        }
    }
}