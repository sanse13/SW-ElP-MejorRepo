<?xml version="1.0" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="/">
		<HTML>
			<BODY>
				<P>COMO TRANSFORMAR XML EN UNA TABLA HTML</P>
				<TABLE border="1" border-spacing="5px">
					<THEAD>
						<TR>
							<TH>Autor</TH>
							<TH>Enunciado</TH>
							<TH>Respuesta correcta</TH>
							<TH>Respuestas incorrectas</TH>
							<TH>Tema</TH>
						</TR>
					</THEAD>
					<xsl:for-each select="/assessmentItems/assessmentItem" >
						<TR>
							<TD>
								<xsl:value-of select="@author"/>
								<BR/>
							</TD>
							<TD>
								<xsl:value-of select="itemBody/p"/>
								<BR/>
							</TD>
							<TD>
								<xsl:value-of select="correctResponse/response"/>
								<BR/>
							</TD>
							<TD>
								<ul>
									<xsl:for-each select="incorrectResponses/response">
										<li>
											<xsl:value-of select="."/>
										</li>
									</xsl:for-each>
								</ul>
							</TD>
							<TD>
								<xsl:value-of select="@subject"/>
								<BR/>
							</TD>
						</TR>
					</xsl:for-each>
				</TABLE>
			</BODY>
		</HTML>
	</xsl:template>
</xsl:stylesheet>