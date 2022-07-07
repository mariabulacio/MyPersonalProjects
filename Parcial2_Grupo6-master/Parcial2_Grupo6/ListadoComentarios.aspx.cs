using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace Parcial2_Grupo6
{
    public partial class ListadoComentarios : System.Web.UI.Page
    {
        private DataLinqClassDataContext instance;
        protected void Page_Load(object sender, EventArgs e)
        {
            instance = new DataLinqClassDataContext();
            IQueryable consultaTodosComentarios = instance.comentarios.Select(dato => dato);

            GridView1.DataSource = consultaTodosComentarios;
            GridView1.DataBind();
        }

        protected void Volver_Click(object sender, EventArgs e)
        {
            Response.Redirect("ingresoAlumnos.aspx");
        }
        //protected void Editar_Click(object sender, EventArgs e)
        //{

        //}

        //protected void Eliminar_Click(object sender, EventArgs e)
        //{
        //    string selectedGrid = GridView1.SelectedIndex.ToString();
        //    IQueryable<comentario> deleteComment = instance.comentarios.Where(dato => dato.dni_alumno.ToString() == selectedGrid);

        //    instance.comentarios.DeleteAllOnSubmit(deleteComment);
        //    instance.SubmitChanges();
        //}
    }
}