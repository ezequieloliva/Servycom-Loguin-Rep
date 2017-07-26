Public Class Form1
    Dim vector(100) As String
    Private Sub Form1_Load(sender As Object, e As EventArgs) Handles MyBase.Load

    End Sub

    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click
        For n = 1 To 3
            For x = 4 To 6
                combo.Items.Add(n & " vs" & x)

            Next
        Next
        For n = 4 To 6
            For x = 1 To 3
                combo.Items.Add(n & " vs" & x)

            Next
        Next
    End Sub
End Class
